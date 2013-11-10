<?php

Yii::import('application.models._base.BaseUser');

class User extends BaseUser {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function collectInfo() {
        $cmd_count = 0;
        //  $categories = array('1' => 'check-in', '2' => 'link', '3' => 'status','4'=>'photo', '5' => 'video', '6' => 'comment', '7' => 'others',);
        $categories = array('2' => 'link', '3' => 'status', '5' => 'video', '4' => 'photo');

        //***************Set Times***********
        ini_set('max_execution_time', 60 * 60);
        $start_time = mktime(0, 0, 0, date("m"), date("d") - 2, date("Y"));
        //   $end_time = mktime(0, 0, 0, date("m"), date("d") - 3, date("Y"));
        $end_time = time();
        $time_step = 12 * 60 * 60; //24 Hour
        //***************Set User Attributes & Save in DB****************
        if (Yii::app()->facebook->isUserLogin()) {
            $this->fbid = Yii::app()->facebook->getUser();

            $this->start_time = date("Y-m-d H:i:s", $start_time);
            $this->end_time = date("Y-m-d H:i:s", $end_time);
            $this->created_at = new CDbExpression('NOW()');


            if ($this->save()) {
                // Yii::log('success');
                // echo 'success';
            } else {
                print_r($this->getErrors());
            }
        } else {
            // echo 'cannot save user in DB!';
        }

        //****************************Fetch Friends Posts *********************************
        $all_friends = Yii::app()->facebook->api('/me/friends');
        $cmd_count++;
        $i = 0;
        $all = array();
        $temp = array();
        $batch_size = 1;
        $sleep_time = 1;


        while ($i < sizeof($all_friends['data'])) {
            $fbid = $all_friends['data'][$i]['id'];
            $command = $fbid . "/posts?fields=id,from,type,link,story,picture,source,name,description,message,created_time&date_format=U&limit=200&since=" . $start_time . "&until=" . $end_time;
            $queries[] = array('method' => 'GET', 'relative_url' => $command);
            $i++;
            if (($i % $batch_size == 0) || ($i == sizeof($all_friends['data']))) {
                $temp = Yii::app()->facebook->api('?batch=' . urlencode(json_encode($queries)), 'POST');
                sleep($sleep_time);
                $cmd_count++;
                // echo 'cmd#: '.$cmd_count.'<br>';
                for ($t = 0; $t < count($temp); $t++) {
                    $all[$fbid] = json_decode($temp[$t]['body'], true);
                }
                $queries = array();
                $temp = array();
            }
        }

        //****************Save All Friends in DB*******************
            
        for ($f = 0; $f < sizeof($all_friends['data']); $f++) {

            $fbid = $all_friends['data'][$f]['id'];
            
            $friend = new Friend();
            $friend->fbid = $fbid;
            $friend->name = $all_friends['data'][$f]['name'];
            $friend->user = $this->id;
            if ($friend->save()) {
                //Yii::log('success');
                // echo 'success';
            } else {
                Yii::log($this->getErrors());
                print_r($this->getErrors());
            }

            //*********** A Loop on All the Posts of Friend $fbid to Save In DB*************

            if (isset($all[$fbid]['data'])) {

                for ($j = 0; $j < count($all[$fbid]['data']); $j++) {
                    $postdata = new PostData();
                    $postdata->friend = $friend->id;
                    $postdata->user = $this->id;
                    $postdata->seen = 0;

                    if (isset($all[$fbid]['data'][$j]['id']))
                        $postdata->post_id = $all[$fbid]['data'][$j]['id'];

                    if (isset($all[$fbid]['data'][$j]['description']))
                        $postdata->description = $all[$fbid]['data'][$j]['description'];

                    if (isset($all[$fbid]['data'][$j]['name']))
                        $postdata->name = $all[$fbid]['data'][$j]['name'];

                    if (isset($all[$fbid]['data'][$j]['story']))
                        $postdata->story = $all[$fbid]['data'][$j]['story'];

                    if (isset($all[$fbid]['data'][$j]['link']))
                        $postdata->link = $all[$fbid]['data'][$j]['link'];

                    if (isset($all[$fbid]['data'][$j]['picture']))
                        $postdata->picture = $all[$fbid]['data'][$j]['picture'];

                    if (isset($all[$fbid]['data'][$j]['message']))
                        $postdata->message = $all[$fbid]['data'][$j]['message'];

                    if (isset($all[$fbid]['data'][$j]['source']))
                        $postdata->source = $all[$fbid]['data'][$j]['source'];

                    if (isset($all[$fbid]['data'][$j]['from'])) {
                        if (isset($all[$fbid]['data'][$j]['from']['id']))
                            $postdata->from_id = $all[$fbid]['data'][$j]['from']['id'];
                        if (isset($all[$fbid]['data'][$j]['from']['name']))
                            $postdata->from_name = $all[$fbid]['data'][$j]['from']['name'];
                    }

                    if (isset($all[$fbid]['data'][$j]['created_time']))
                        $postdata->created_time = date("Y-m-d H:i:s", $all[$fbid]['data'][$j]['created_time']);

                    if ($postdata->save()) {
                        
                    } else {
                        //Yii::log($postdata->getErrors());
                        echo 'cannot save this post since:<br>';
                        print_r($postdata->getErrors());
                        return;
                    }

                    //**********Set Posts variable to use for filling Post Table******
                    $cat_all = $all[$fbid]['data'][$j]['type'];
                    if (isset($all[$fbid]['data'][$j]['link']))
                        $posts[$fbid][$cat_all]['all'][] = $all[$fbid]['data'][$j]['link'];
                    else
                        $posts[$fbid][$cat_all]['all'][] = 'no link';
                }
            }
        }

        //*************************************Fetch My(Seen) Posts*********************************
        for ($ctime = $start_time; $ctime < $end_time; $ctime += $time_step) {
            //   $accesToken = Yii::app()->facebook->getAccessToken();
            // $cmd = "me/home?fields=id,from,type,link,story,link,picture,source,name,description,message&limit=500&since=" . $ctime . "&until=" . ($ctime + $time_step);
            $cmd = "me/home?fields=id,from,type,link&limit=500&since=" . $ctime . "&until=" . ($ctime + $time_step);
            $me = Yii::app()->facebook->api($cmd);
            $cmd_count++;

            //************Loop on $me posts******
            for ($i = 0; $i < sizeof($me['data']); $i++) {
                $fbid = $me['data'][$i]['from']['id'];
                //echo 'Processing me, friend: ' . $fbid . '<br>';
                $post_id = $me['data'][$i]['id'];

                //*********Change the status of this post in PostData table to 'seen'*************

                $pd = PostData::model()->find('post_id=:post_id', array(':post_id' => $post_id));

                if (isset($pd)) {
                    $pd->seen = 1;
                    $pd->save();
                }

                //***********This is for saving that each category has post or not for this friend $fbid******
                $cat_me = $me['data'][$i]['type'];
                if (isset($me['data'][$i]['link']))
                    $posts[$fbid][$cat_me]['me'][] = $me['data'][$i]['link'];
                else
                    $posts[$fbid][$cat_me]['me'][] = 'no link';
            }
        }



        // ***********************Save seen & notseen stats in Post table***********************

        for ($f = 0; $f < sizeof($all_friends['data']); $f++) {

            $fbid = $all_friends['data'][$f]['id'];
            $friend = Friend::model()->find('fbid=:fbid AND user=:user', array('fbid' => $fbid, 'user' => $this->id));

            // echo 'saving in post table: ' . $fbid . '<br>';
            $all_seen = 0;
            $all_not_seen = 0;

            //*********Save categories******************
            foreach ($categories as $key => $value) {
                //echo '$key->' . $key . '<br>';
                //echo '$value->' . $value . '<br>';
                if (isset($posts[$fbid][$value]['me'])) {
                    $post_seen = count($posts[$fbid][$value]['me']);
                } else {
                    $post_seen = 0;
                }

                if (isset($posts[$fbid][$value]['all'])) {
                    $post_not_seen = count($posts[$fbid][$value]['all']) - $post_seen;
                } else {
                    $post_not_seen = 0;
                }

                if ($post_seen != 0 || $post_not_seen != 0) {
                    $all_seen += $post_seen;
                    $all_not_seen += $post_not_seen;

                    $post = new Post;
                    $post->friend = $friend->id;
                    $post->category = $key;
                    $post->seen = $post_seen;
                    $post->not_seen = $post_not_seen;
                    $post->save();
                }
            }

            //********Save 'All = 8' Category*****
            if ($all_seen != 0 || $all_not_seen != 0) {
                $post = new Post;
                $post->friend = $friend->id;
                $post->category = 8;
                $post->seen = $all_seen;
                $post->not_seen = $all_not_seen;
                $post->save();
            }
        }
    }

}