create DATABASE cafeteria ;

CREATE TABLE users (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    name varchar(255),
    email varchar(255),
    password varchar(255),
    room varchar(125),
    ext varchar(125),
    image varchar(255),
    is_admin enum(true ,false) DEFAULT false,
    created_at DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY(id)
)

CREATE TABLE products (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    name varchar(255),
    category varchar(255),
    price varchar(120),
    image varchar(255),
    action varchar(128),
    created_at DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY(id)
)
CREATE TABLE orders (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    order_date DATETIME NOT NULL DEFAULT NOW(),
    notes varchar(120),
    room varchar(120),
    action varchar(128) DEFAULT processing,
    amount varchar(120),
    user_id INTEGER UNSIGNED NOT NULL,
    product_id INTEGER UNSIGNED NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES users(id),
    FOREIGN KEY(product_id) REFERENCES products(id)
)

