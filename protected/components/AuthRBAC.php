<?php

class AuthRBAC extends CApplicationComponent {

    public function init() {
        
    }

    public function checkAccess($item = NULL) {        
        
        Yii::import('application.modules.seguridad.models.Users');
        Yii::import('application.modules.seguridad.models.UsersRolesItems');
        Yii::import('application.modules.seguridad.models.RolesItems');
        Yii::import('application.modules.seguridad.models.Items');

        if ($item != NULL) {

            $sql = new CDbCriteria();

            $sql->condition = "user.id = :user_id || t.user_id = :user_id AND item.item = :item_name AND rolItem.active = 1 AND item.active = 1";

            $sql->params = array(':user_id' => 39, ':item_name' => $item);

            $sql->with = array('rolItem' => array('with' => 'item'), 'user');

            $validacion = UsersRolesItems::model()->findAll($sql);
          
            
            if(is_array($validacion)){
                if (count($validacion) == 1) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
            
        } else {
            return FALSE;
        }
    }

}
