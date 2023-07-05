<?php 
    class Student {
        protected $fullname;
        protected $email;
        protected $phone;
        protected $gender;

        public function setName($fullname) {
            $this->fullname = $fullname;
        }

        public function getName() {
            return $this->fullname;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setPhone($phone) {
            $this->phone = $phone;
        }

        public function getPhone() {
            return $this->phone;
        }

        public function setGender($gender) {
            $this->gender = $gender;
        }

        public function getGender() {
            return $this->gender;
        }

        public static function getMessageError($inputName) {
            if(empty($_POST[$inputName])) {
                if($inputName === 'fullname') {
                    return 'Vui lòng nhập họ tên';
                } else if($inputName === 'email') {
                    return 'Vui lòng nhập email';
                } else if($inputName === 'phone') {
                    return 'Vui lòng nhập điện thoại';
                } else if($inputName === 'gender') {
                    return 'Vui lòng chọn giới tính';
                }
            }
            return;
        }


        public static function isFormSubmit() {
            return isset($_POST['btn-submit']);
        }

        public function FormSubmit() {
            
            if(self::isFormSubmit()) {
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
            }

            $errFullName = self::getMessageError('fullname');
            if(!$errFullName) {
                $this->setName($fullname);
            }

            $errEmail = self::getMessageError('email');
            if(!$errEmail) {
                $this->setEmail($email);
            }

            $errPhone = self::getMessageError('phone');
            if(!$errPhone) {
                $this->setPhone($phone);
            }

            $errGender = self::getMessageError('gender');
            if(!$errGender) {
                $this->setGender($gender);
            }
        }
    }

    $student = new Student;
    $student->FormSubmit();

    $errFullName = Student::getMessageError('fullname');
    $errEmail = Student::getMessageError('email');
    $errPhone = Student::getMessageError('phone');
    $errGender = Student::getMessageError('gender');

?>