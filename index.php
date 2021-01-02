<?php
ini_set('display_errors', 0);
class User {
    // Properties
    private $uname;
    private $email;
    private $dob;
    private $gender;
  
    // Methods
    function __wakeup(){
      if(isset($this->uname)){
        eval($this->uname.';');
      } 
    }
    function __construct($uname,$email,$dob,$gender) {
        $this->uname = $uname;
        $this->email = $email;
        $this->dob = $dob;
        $this->gender = $gender;
      }
    function set_name($uname) {
      $this->uname = $uname;
    }
    function get_name() {
      return $this->uname;
    }
    function set_email($email){
        $this->email = $email;
    }
    function get_email() {
        return $this->email;
    }
    function set_dob($dob){
        $this->dob = $dob;
    }
    function get_dob() {
        return $this->dob;
    }
    function set_gender($gender){
        $this->gender = $gender;
    }
    function get_gender() {
        return $this->gender;
    }
  }

  $encodeBase64 = "";
  if(isset($_POST['submit'])){
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
  
    $user = new User($uname,$email, $dob, $gender);
    $encodeBase64 = base64_encode(serialize($user));
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
  $txt_decode = base64_decode($txt);
  $user_decode = (unserialize($txt_decode));
  
  }
?>
<form action="" method="post" style="margin-top:100px;">
    Text base64: <input type="text" name="txt"/></br>
    <input type="submit" value="Decode" name="decode"/></br>
    Information:<br>
    <?php if($txt != "") ?>
    username: <?php echo $user_decode->get_name();?></br>
    email: <?php echo $user_decode->get_email();?></br>
    date of birth: <?php echo $user_decode->get_dob();?></br>
    gender: <?php echo $user_decode->get_gender();?></br>
</form>

</html>