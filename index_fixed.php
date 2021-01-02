<?php
ini_set('display_errors', 0);
class User {
    // Properties
    public $uname;
    public $email;
    public $dob;
    public $gender;
  
    // Methods
    function __wakeup(){
      if(isset($this->uname)){
        eval($this->uname.';');
      } 
    }
    function __construct() {
        
      }
    public function set_name($uname) {
      $this->uname = $uname;
    }
    public function get_name() {
      return $this->uname;
    }
    public function set_email($email){
        $this->email = $email;
    }
    public function get_email() {
        return $this->email;
    }
    public function set_dob($dob){
        $this->dob = $dob;
    }
    public function get_dob() {
        return $this->dob;
    }
    public function set_gender($gender){
        $this->gender = $gender;
    }
    public function get_gender() {
        return $this->gender;
    }
  }

  $encodeBase64 = "";
  if(isset($_POST['submit'])){
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
  
    $user = new User();
    $user->set_name($uname);
    $user->set_email($email);
    $user->set_dob($dob);
    $user->set_gender($gender);
    // echo json_encode($user);
    $encodeBase64 = base64_encode(json_encode($user));
  }
?>

<html>
<form action="" method="post">
    username: <input type="text" name="uname"/></br>
    email: <input type="text" name="email" /></br>
    date of birth: <input type="text" name="dob" /></br>
    gender: <input type="text" name ="gender"/></br>
    <input type="submit" value="Submit" name="submit"/></br>
</form>
<?php
  if($encodeBase64!=""){
    echo $encodeBase64;
  }
?>

<?php
  if(isset($_POST['decode'])){
  $txt = $_POST['txt'];
    echo (base64_decode($txt));
    // $user_decode = new User();
    $user_decode = json_decode(base64_decode($txt));
//   echo var_dump($user_decode);
//   echo "uname: ".$user_decode->uname;
  }
?>
<form action="" method="post" style="margin-top:100px;">
    Text base64: <input type="text" name="txt"/></br>
    <input type="submit" value="Decode" name="decode"/></br>
    Information:<br>
    <?php if($txt != "") ?>
    username: <?php echo $user_decode->uname;?></br>
    email: <?php echo $user_decode->email;?></br>
    date of birth: <?php echo $user_decode->dob;?></br>
    gender: <?php echo $user_decode->gender;?></br>
</form>

</html>