# VCS_C11
Lỗi unsafe deserialize có thể bị khai thác RCE bằng các đoạn mã thực thi php khi sử dụng function unserialize để giải mã, nó sẽ tự động gọi __wakeup()trong object để thực thi

Thử bằng đoạn mã php để đọc file từ phía server:

$myfile = fopen("hack.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("hack.txt"));
fclose($myfile);

Khắc phục bằng việc thay thế mã hóa serialize bằng json
