<div class="hero-unit">
    <h2>Welcome to FeedVis</h2>
    <p>
        FeedVis is ... <br>
        Please first login with your Facebook account to continue. We collect your profile data in next step to process ... 
    </p>
    <p>

        <?php
        $fbID = Yii::app()->facebook->getUser();
        if ((Yii::app()->facebook->isUserLogin())) {
            //For the version of two separate phases 
            /*  echo CHtml::button('Create Your Groups', array('class' => 'btn btn-primary btn-large', 'submit' => array('frontend/thanks')));
              echo  '<br>';
              if ((sizeof(User::lastLogins($fbID)) != 0)) { //Further Login
              echo CHtml::button('Go to Your Groups', array('class' => 'btn btn-primary btn-large', 'submit' => array('frontend/clustering')));
              //TODO: Must show all the logins informations
              }
             */
            
            echo CHtml::button('Start', array('class' => 'btn btn-primary btn-large', 'submit' => array('user/load')));
        }
        ?>



    </p>
</div>