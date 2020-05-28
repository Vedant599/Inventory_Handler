CREATE TABLE invoice (
    invoice_no INT(11) PRIMARY KEY AUTO_INCREMENT,
    customer_name VARCHAR(250) NOT NULL,
    order_date DATE NOT NULL,
    sub_total DOUBLE NOT NULL,
    gst DOUBLE NOT NULL,
    discount DOUBLE NOT NULL,
    net_total DOUBLE NOT NULL,
    paid DOUBLE NOT NULL,
    due DOUBLE NOT NULL,
    payment_type TEXT(20) NOT NULL
    );

CREATE TABLE invoice_details (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    invoice_no INT(11) NOT NULL,
    product_name VARCHAR(250) NOT NULL,
    price DOUBLE NOT NULL,
    qty INT(11) NOT NULL,
    FOREIGN KEY (invoice_no) REFERENCES invoice(invoice_no)
    );

CREATE TABLE purchase(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    product_id INT(11) NOT NULL,
    stock_added INT(11) NOT NULL,
    purchase_date DATE NOT NULL,
    FOREIGN KEY(product_id) REFERENCES products(pid)

);