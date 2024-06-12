# 📚 eBook Apps

The eBook Apps is a web application that helps you browse ebooks from anywhere using your smartphone and laptop.

![eBook Apps Screenshot](https://user-images.githubusercontent.com/95717485/212527253-ac08191b-a4da-46a2-939f-74ffd2d51e99.png)

## 🚀 Getting Started

To start running your project locally, follow these steps:

First, clone the repository to the htdocs or www folder.

```bash
git clone https://github.com/madfauzy/eBook-Apps.git
```

Then, launch the XAMPP control panel or Laragon.

Then, start Apache and MySQL.

Then, run phpMyAdmin in your browser.

```text
http://localhost/phpmyadmin/
```

Next, create database `ebookapps` and import `ebookapps.sql`

Finally, run the eBooks Apps.

```text
http://localhost/eBook-Apps/
```

## 🐳 Getting Started with Docker

If you want to use Docker instead, clone the repository, make sure to have Docker and Docker Compose installed and the Docker daemon running, then execute:

```text
docker-compose up -d
```

and run the eBooks Apps.

```text
http://localhost/
```


## 📍 Login Account For Local

```text
Username: admin
Password: admin
```

```text
Username: member
Password: member
```

## 🔑 User Privileges and Roles

```text
Visitor -> Access Home and List eBook
```

```text
Member -> Access Home, List eBook, and Add eBook
```

```text
Admin -> Access Home, List eBook, Add eBook, Update eBook, and Delete eBook
```

## 📄 License

The eBook Apps is open-source project licensed under the [MIT License](https://github.com/madfauzy/eBook-Apps/blob/main/LICENSE).
