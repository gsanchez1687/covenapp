<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $_id;   

    public function authenticate() {
        
        Yii::import('application.modules.seguridad.models.Users');
        Yii::import('application.modules.seguridad.models.Personas');
        Yii::import('application.modules.ventas.models.Dominios');
        
        
        $user = Users::model()->find(array(
                                            'condition' => "Persona.correo = :email OR t.username =:username",
                                            'join'=>'INNER JOIN personas Persona ON (Persona.id = t.persona_id)',
                                            'params' => array(':email' => strtolower($this->username),':username'=>strtolower($this->username))   
                                          )
                                    );

      
        if ($user === null){
            
            Yii::app()->user->setFlash('success', "La cuenta a la que intentas ingresar no existe");
        }
        
        else if (!$user->validatePassword($this->password)){
           Yii::app()->user->setFlash('success', "La contraseña es incorrecta");       
           
        } else if($user->persona->estado_id == '9'){
            
            Yii::app() -> user->setFlash('success', "Usuario Inactivo");
	    $this -> errorCode = self :: ERROR_PASSWORD_INVALID;
            
        }  else if($user->persona->estado_id == '10' ) {
            
            Yii::app() -> user->setFlash('success', "Usuario Suspendido");
            $this -> errorCode = self :: ERROR_PASSWORD_INVALID;
        }
        
        else {
            $this->_id = $user->id;         
            $this->setState('foto', $user->foto);
            $this->setState('username', $user->username);
            $this->setState('rol', $user->rol_id);
            $this->setState('nombre', $user->persona->nombre);                       
            $this->setState('apellido', $user->persona->apellido);                       
            $this->username = $user->username;
           
            $this->errorCode = self::ERROR_NONE;
        }
        return $this->errorCode == self::ERROR_NONE;
    }
    
    public function getId() {
        return $this->_id;
    }

   

}
