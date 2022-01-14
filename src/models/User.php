<?php
    class User extends Model {
        protected static $tableName = 'users';
        protected static $columns = ['id',
                                'name',
                                'password',
                                'email',
                                'start_date',
                                'end_date',
                                'is_admin',
        ];

        public static function getActiveUsersCount() {
            return static::getCount(['raw' => 'end_date IS NULL']);
        }

        public function insert() {
            $this->validate();
            $this->is_admin = $this->is_admin ? 1 : 0;
            if (!$this->end_date) {
                $this->end_date = null;
            }
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
            return parent::insert();
        }

        private function validate() {
            $errors = [];

            if (!$this->name) {
                $errors['name'] = 'Nome é um campo Obrigatório!';
            }
            if (!$this->email) {
                $errors['email'] = 'E-mail é um campo Obrigatório!';
            } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'O E-mail informado não é válido!';
            }
            if ($this->end_date && !DateTime::createFromFormat('Y-m-d', $this->end_date)) {
                $errors['end_date'] = 'Data do desligamento deve seguir o padrão DD/MM/YYYY!';
            }
            if (!$this->password) {
                $errors['password'] = 'Senha é um campo Obrigatório!';
            }
            if (!$this->confirm_password) {
                $errors['confirm_password'] = 'Confirmação de senha é um campo Obrigatório!';
            }
            if (!$this->start_date) {
                $errors['start_date'] = 'Data de Admissão é um campo Obrigatório!';
            } elseif (!DateTime::createFromFormat('Y-m-d', $this->start_date)) {
                $errors['start_date'] = 'Data de Admissão deve seguir o padrão DD/MM/YYYY!';
            }
            if ($this->password && $this->confirm_password
                && $this->password !== $this->confirm_password) {
                $errors['password'] = 'As senhas não conferem!';
                $errors['confirm_password'] = 'As senhas não conferem!';
            }
            
            if (count($errors) > 0) {
                throw new ValidationException($errors);
            }
        }
    }

?>