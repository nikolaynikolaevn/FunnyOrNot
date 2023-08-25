<?php
session_start();
if(isset($_SESSION['user_id'])) {
unset($_SESSION['user_id']);
unset($_SESSION['logged_in']);
echo "<p>You are logged out successfully.</p>";
}
?>
<script>
alert("sdfsdf");
</script>