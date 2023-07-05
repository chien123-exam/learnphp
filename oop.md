#OOP
 - OOP là một phương pháp lập trình trong đó các đối tượng là trung tâm của việc phân tích, thiết kế và triển khai ứng dụng

#Class
- Trong OOP PHP, một class là một mô hình để tạo ra các đối tượng. Nó định nghĩa cách mà một đối tượng sẽ hoạt động và có các thuộc tính (biến) và phương thức (hàm) để đại diện cho dữ liệu và hành vi của đối tượng.


class Person {
  public $name;
  public $age;
}

#Object
- Trong OOP, một object (đối tượng) là một thể hiện cụ thể của một class. Nó là một "đối tượng" thực sự được tạo ra từ một bản thiết kế (class) và có thể được sử dụng để thực hiện các hoạt động và lưu trữ dữ liệu.

class Person {
  public $name;
  
  public function sayHello() {
    echo "Hello, my name is " . $this->name;
  }
}

// Tạo một object từ class Person
$person = new Person();

#Property:
- Trong OOP (Object-Oriented Programming), một property (thuộc tính) là một biến được định nghĩa trong một class để lưu trữ dữ liệu hoặc trạng thái của một object. Nói cách khác, thuộc tính là các biến dữ liệu của một object.

#Method:
+public: có thể được truy cập và gọi từ bên ngoài class đó.

class Person {
  public $name;
  
  public function sayHello() {
    echo "Hello, my name is " . $this->name;
  }
}


$person = new Person();
$person->name = "John";
$person->sayHello()

+protected: chỉ có thể truy cập từ bên trong class và các class con kế thừa nó, không thể truy cập từ bên ngoài class.

+private: chỉ có thể truy cập từ bên trong class đó, không thể truy cập từ bên ngoài class hay các class con kế thừa.

+static:  là một từ khóa được sử dụng để định nghĩa một thuộc tính hoặc phương thức thuộc về class thay vì các instance (object) của class đó. Các thuộc tính và phương thức static có thể được truy cập trực tiếp từ class mà không cần tạo object.

+const: là một từ khóa được sử dụng để định nghĩa một hằng số trong một class. Một hằng số là một giá trị không thay đổi trong suốt quá trình thực thi chương trình.

+extends: được sử dụng để tạo một mối quan hệ kế thừa giữa các class. Class con có thể kế thừa các thuộc tính và phương thức từ class cha.

class Animal {
  protected $name;
}

class Cat extends Animal {
  public function __construct($name) {
    $this->name = $name;
  }
}

+parent: chống kế thừa một thuộc tính của lớp cha 
    Chống ghi đè (orverride): parent::tênClass()


+clone: được sử dụng để tạo một bản sao đối tượng hiện có. Khi sử dụng từ khóa "clone", một bản sao mới của đối tượng sẽ được tạo ra, với tất cả các thuộc tính được sao chép từ đối tượng gốc.

+trait: là một cơ chế cho phép bạn tái sử dụng code trong nhiều lớp mà không phải mở rộng từ một lớp cơ sở duy nhất, nhưng vẫn chia sẻ các phương thức và thuộc tính chung. Nó giúp giải quyết vấn đề đa kế thừa trong OOP PHP.

trait MyTrait {
    public function sharedMethod() {
        // Code của phương thức chia sẻ
    }
}

class MyClassA {
    // Sử dụng trait trong lớp
    use MyTrait;

    // Định nghĩa các phương thức và thuộc tính riêng của lớp

    public function myMethodA() {
        // Code của phương thức riêng của lớp
        $this->sharedMethod(); // Gọi phương thức chia sẻ
    }
}

Trong ví dụ trên, trait `MyTrait` chứa một phương thức `sharedMethod()`. Lớp `MyClassA`sử dụng trait này bằng cách sử dụng từ khóa `use` và đều có thể gọi phương thức `sharedMethod()` từ trait.


+final (Chống override, không cho phép kế thừa)

class ParentClass {
    final public $finalProperty; // final thuộc tính

    // code của lớp
}

class ChildClass extends ParentClass {
    // Ghi đè thuộc tính không được phép
    // Lỗi sẽ xảy ra trong quá trình chạy
    public $finalProperty; 
}

Trong ví dụ trên, thuộc tính `$finalProperty` trong lớp cha `ParentClass` được khai báo là "final". Do đó, lớp con `ChildClass` không thể ghi đè thuộc tính này.

- abstract: Lớp trừu tượng, phương thức trừu tượng
    - Lớp trừu tượng là lớp có hoặc không có phương thức trừu tượng
    - Những class con kế thừa lớp trừu tượng này sẽ 
        phải định nghĩa lại các phương thức trừu tượng của lớp trừu tượng
    
    - Connect Database (connect) : Database 
        class Database
            + connect()
        class User {
            // Sử dụng đối tượng user //  access vào database
        }

        class Product {
            // Sử dụng đối tượng Product // access vào database
        }

-__construct(): cho phép người dùng khởi tạo các thuộc tính của một đối tượng khi tạo đối tượng.

<?php
class Audi
	{
		public $infor;
		public $money;

		function __construct($infor, $money)
		{
			$this->infor = $infor;
			$this->money = $money;
		}

		function get_infor() 
		{
			return $this->infor;
		}

		function get_money()
		{
			return $this->money;
		}
	}

?>

-__destruct(): dùng để thực hiện các hoạt động dọn dẹp trước khi xóa bỏ đối tượng đã tạo

<?php
class DoiTuong {
  public $ten;
  public $tuoi;
  function __construct($ten, $tuoi) {
    $this->ten = $ten;
    $this->tuoi = $tuoi;
  }
  function __destruct() {
    echo "Đây là  {$this->ten} sinh năm {$this->tuoi}";
  }
}
?>

-Namespace (không gian đặt tên) trong PHP được sử dụng để quản lý việc đặt tên cho các khối mã và tránh xung đột tên trong các dự án lớn hoặc khi sử dụng các thành phần từ các thư viện bên ngoài.

Một namespace trong PHP được khai báo bằng từ khóa `namespace` và sẽ tương ứng với một thư mục hoặc một nhóm các tệp tin mã. Bạn có thể đặt tên cho namespace theo cú pháp tương tự đường dẫn thư mục, sử dụng dấu gạch chéo ngược `\` để phân tách các thành phần.

namespace MyNamespace;

class MyClass {
    public function hello() {
        echo "Hello from MyClass!";
    }
}

Khi bạn muốn sử dụng class "MyClass" từ namespace "MyNamespace", bạn có thể thực hiện như sau:

require_once 'path/to/MyClass.php';

use MyNamespace\MyClass;

$myObject = new MyClass();
$myObject->hello();


+ Trong ví dụ trên, chúng ta sử dụng từ khóa `use` để chỉ định rõ ràng rằng chúng ta muốn sử dụng class "MyClass" từ namespace "MyNamespace". Việc này giúp cho mã của chúng ta dễ đọc hơn và tránh xung đột tên trong trường hợp có nhiều class cùng tên được định nghĩa trong các namespace khác nhau.

+ Namespace cũng có thể được sử dụng để tạo ra thư mục/trình tự hệ thống cho tệp tin mã. Ví dụ, nếu bạn khai báo một namespace có tên "MyNamespace\SubNamespace", thì bạn có thể đặt tệp tin mã của mình trong thư mục "MyNamespace/SubNamespace".
    
