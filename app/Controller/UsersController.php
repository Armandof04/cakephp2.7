<?php 
class UsersController extends AppController {
	/**
 	* El controlador usa los siguientes modelos
 	*
 	* @var array
 	*/
	public $uses = array('User');

	/**
	*Utiliza los siquientes helpers pra crear los forms
	*
	* @var array
	*/
    public $helpers = array ('Html','Form');

    /**
	* Utiliza los siquientes componentes pra crear los forms
	*
	* @var array
	*/
    public $components = array('Session');

    /**
    *Function Index
    *
    * Muestra la información y/o datos de la agenda
    *@return void 
    */
    public function index() {
        $params = array('order' => 'last_name');
        $this->set('users', $this->User->find('all', $params));
    }
    /**
    * Function Add
    *
    * Agrega un contacto a la tabla user
    * @return void
    * @autor armandof.alu@gmail.com
    */
    public function add(){
    	if($this->request->is('post'))
    	{
            var_dump($this->request->data);
           
            //Se reciben datos y se acortan los nombres
            $user['User']['first_name']= $this->request->data['User']['first_name'];
            $user['User']['last_name']= $this->request->data['User']['last_name'];
            $user['User']['address']= $this->request->data['User']['address'];
            $user['User']['suburb']= $this->request->data['User']['suburb'];
            $user['User']['cp']= $this->request->data['User']['cp'];
            $user['User']['state']= $this->request->data['User']['state'];
            $user['User']['occupation']= $this->request->data['User']['occupation'];
            
            /*
            *Creo un ciclo para unificar los telefonos en un array
            *Si se requiere se crea un array $User['tel_tabla']['tel']; para guardar los datos en otra tabla
            */
            $contTel =$this->request->data['User']['telCont'];
            $i=1;
            while ($i <= $contTel) {
                $phone[]  = $this->request->data['User']["phone$i"];
                $i++;
            }
            $phone = implode(',', $phone); //convierto un array en un string
            $user['User']['phone']=$phone; //asignamos el valor

            /*
            *Creo un ciclo para unificar los email en un array
            *Si se requiere se crea un array $User['email_tabla']['email']; para guardar los datos en otra tabla
            */
            $contEmail =$this->request->data['User']['emailCont'];
            $i=1;
            while ($i <= $contEmail) {
                $email[]  = $this->request->data['User']["email$i"];
                $i++;
            }
            $email = implode(',', $email); //convierto un array en un string
            $user['User']['email']=$email; //asignamos el valor

           
            
    		if($this->User->Save($user))
    		{
    			$this->Session->setFlash('<div class="alert alert-success">
                                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                                        <strong>¡Correcto!</strong> El usuario se ha guardado</div>');
    			$this->redirect(array('action'=>'index'));
    		}
            else
            {
                $this->Session->setFlash('<div class="alert alert-danger">
                                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                                         <strong>¡Error!</strong> Hubo un error, intente nuevamente</div>');
            }
    	}
    }

    /**
    * Function edit 
    *
    * Edita un registro de la tabla Users
    * @return void
    * @autor armandof.alu@gmail.com
    */
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('<div class="alert alert-danger">
                            <a class="close" data-dismiss="alert" href="#">&times;</a>
                            Contacto no válido</div>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('<div class="alert alert-success">
                        <strong>¡Correcto!</strong>El contacto ha sido guardado'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('<div class="alert alert-danger">
                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                        El estudiante no pudo guardarse. Intente otra vez.</div>'));
            }
        } else {
            $this->request->data = $this->User->read();
        }
    }

    /**
    * Function delete 
    *
    * Elimina un registro de la tabla Users
    * @return void
    * @autor armandof.alu@gmail.com
    */
   public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException(); //excepcion o error en tiempo de ejecución 
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('<div class="alert alert-danger">
                                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                                        Contacto no válido</div>'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('<div class="alert alert-info">
                                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                                        Contacto eliminado</div>'));
            $this->redirect(array('action' => 'index'));
        }
        else
        {
        $this->Session->setFlash(__('<div class="alert alert-danger">
                                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                                        El contacto no fue eliminado</div>'));
        $this->redirect(array('action' => 'index'));
        }
    }
}