# quanlybangiay
# Dự án Admin tool giúp người dùng có thể quản lý cửa hàng bán giày 

* Điều kiện tiên quyết:
- PHP: 7.4.30
* Lưu ý: Khi tải code về chạy vui lòng coi lại đường dẫn BASE trong file config.php ở trong thư mục System -> Config -> config.php

* Frontend
- Gentelella - Bootstrap Admin Template by Colorlib

* Backend
- PHP 

* Mồ hình triển khai
- MVC

* Sử dụng mysql để tương tác với database

* Các chức năng của hệ thống:
website quản lý cửa hàng bán giày

Cây menu trang admin
ghi chú: 
    + : chức năng hiển thị ra cây menu
    + : chức năng không hiển thị ra cây menu vì cần tham số cụ thể để xử lý
============================
* Tổng quan
* Bán hàng
   - Đơn hàng
        --> Cập nhật đơn hàng
   - Khách hàng
        --> Cập nhật khách hàng
    -Báo cáo
* Sản xuất
   - Sản phẩm
        +++> Danh sách
        +++> Thêm
        ---> Sửa
        ---> Xóa
    - Danh mục
        +++> Danh sách
        +++> Thêm
        ---> Sửa
        ---> Xóa
    - Nhà cung cấp
        +++> Danh sách
        +++> Thêm
        ---> Sửa
        ---> Xóa    
* Quản trị
    - Danh sách
    - Thêm
    --> Sửa
    --> Xóa
    - Phân quyền    
        ---> Cấp quyền: Có cố dịnh 3 quyền Manager, Creator, Vistor
                    * Manager là quyền cao nhất có tất cả các chức năng - tài khoản nguyenbaloi - mật khẩu baloi2407
                    * Creator là quyền được phép thực hiện thêm sửa xóa cập nhật bảng product,order,customer,news... nhưng không được tác động đén user vì bảng user là quản lý tài khoản của các thành viên quản trị
                    * Vistor là quyền chỉ được phép xem danh sách hoặc xem thống kê sản phẩm - Mặc định khi đăng ký thì sẻ là quyền visitor
* Hệ thống (Chưa hoàn thiện)
    ++ Lịch sử
    ++ Cấu hình
* Tin tức
    - Danh mục
        +++> Danh sách
        +++> Thêm
        ---> Sửa
        ---> Xóa
    - Bài viết
        +++> Danh sách
        +++> Thêm
        ---> Sửa
        ---> Xóa   
