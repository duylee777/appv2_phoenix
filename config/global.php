<?php
    return [
        'default_roles' => [
            'super_admin' => "Quản trị viên cấp cao",
            'admin' => "Quản trị viên",
            'staff' => "Nhân viên",
            'customer' => "Khách hàng"
        ],

        'role_permissions' => [
            'view_roles' => "Xem danh sách vai trò",
            'create_role' => "Thêm mới vai trò",
            'update_role' => "Cập nhật vai trò",
            'delete_role' => "Xóa vai trò",
        ],

        'user_permissions' => [
            'view_users' => "Xem danh sách người dùng",
            'create_user' => "Thêm mới người dùng",
            'update_user' => "Cập nhật người dùng",
            'delete_user' => "Xóa người dùng",
        ],

        'category_permissions' => [
            'view_categories' => "Xem danh sách danh mục",
            'create_category' => "Thêm mới danh mục",
            'update_category' => "Cập nhật danh mục",
            'delete_category' => "Xóa danh mục",
        ],

        'unit_permissions' => [
            'view_units' => "Xem danh sách đơn vị tính",
            'create_unit' => "Thêm mới đơn vị tính",
            'delete_unit' => "Xóa đơn vị tính",
        ],

        'brand_permissions' => [
            'view_brands' => "Xem danh sách thương hiệu",
            'create_brand' => "Thêm mới thương hiệu",
            'update_brand' => "Cập nhật thương hiệu",
            'delete_brand' => "Xóa thương hiệu",
        ],

        'discount_permissions' => [
            'view_discounts' => "Xem danh sách mã giảm giá",
            'create_discount' => "Thêm mới mã giảm giá",
            'update_discount' => "Cập nhật mã giảm giá",
            'delete_discount' => "Xóa mã giảm giá",
        ],

        'inventory_permissions' => [
            'view_inventories' => "Xem danh sách kho",
            'create_inventory' => "Nhập sản phẩm vào kho",
            'update_inventory' => "Cập nhật số lượng sản phẩm trong kho",
            'delete_inventory' => "Xóa sản phẩm trong kho",
        ],

        'product_permissions' => [
            'view_products' => "Xem danh sách sản phẩm",
            'create_product' => "Thêm mới sản phẩm",
            'update_product' => "Cập nhật sản phẩm",
            'delete_product' => "Xóa sản phẩm",
        ],

        'tag_permissions' => [
            'view_tags' => "Xem danh sách thẻ",
            'create_tag' => "Thêm mới thẻ",
            'update_tag' => "Cập nhật thẻ",
            'delete_tag' => "Xóa thẻ",
        ],

        'post_permissions' => [
            'view_posts' => "Xem danh sách bài viết",
            'create_post' => "Thêm mới bài viết",
            'update_post' => "Cập nhật bài viết",
            'delete_post' => "Xóa bài viết",
        ],

        'contact_permissions' => [
            'view_contacts' => "Xem danh sách liên hệ",
            'update_contact' => "Cập nhật trạng thái liên hệ",
        ],

        'contact_status' => [
            'new' => 'Mới',
            'unread' => 'Chưa đọc',
            'read' => 'Đã đọc',
        ],

    ];
?>