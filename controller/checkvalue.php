// kiểm tra các trường không được phép rỗng rỗng
if (
empty(post('username')) && empty(post('Firstname')) && empty(post('Lastname')) &&
empty(post('DoB')) && empty(post('Gender')) && empty(post('email')) && empty(post('status')) &&
empty(post('password'))
)
$flag = false;

// kiểm tra độ dài các trường
if (
strlen(post('username')) > 100 && strlen(post('password')) > 100 && strlen(post('Firstname')) > 100 &&
strlen(post('Lastname')) > 100 && strlen(post('Division')) > 100 && strlen(post('email')) > 100 && strlen(post('Address'))
)
$flag = false;
// kiểm tra các trường type = number
if (is_numeric(post('Gender')) && is_numeric(post('status')) && is_numeric(post('phone')))
$flag = false;
// kiểm tra trường unique
if (unique_value($list, 'username', post('username')))
$flag = false;
if (unique_value($list, 'email', post('email')))
$flag = false;
// kiểm tra ký tự đặc biệt
if (!preg_match("/^[a-zA-Z ]*$/", post('username')))
$flag = false;
// kiểm tra email
if (!filter_var(post('email'), FILTER_VALIDATE_EMAIL)) {
$flag = false;
}