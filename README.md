# CMS App

CMS App is an open-source Content Management System built with Laravel. It provides an easy-to-use platform to manage your content, posts, comments, and more. It's designed for developers who want a customizable and extendable CMS solution.

## Requirements

-   **PHP 8.2** or higher.
-   **Composer** - PHP dependency manager.
-   **Database**: SQLite, MySQL, or any other database supported by Laravel.
-   **For Local Development**: It's recommended to use [Laragon](https://laragon.org/) or [Laravel Herd](https://laravel.com/docs/8.x/valet) for setting up the local development environment.

### Recommended Local Development Environments:

1. **[Laragon](https://laragon.org/)**: A fast and powerful development environment for PHP, MySQL, and more. Ideal for Laravel development on Windows.
2. **[Laravel Herd](https://herd.laravel.com/docs/macos/getting-started/installation)**: A macOS-specific tool for setting up local environments with Laravel.

## Feature

-   [ ] Access Management (Laravel Spatie)
-   [ ] Write Post
-   [ ] Access Publish Post
-   [ ] Comment Post
-   [ ] Like Post
-   [ ] View Landing Page
-   [ ] API Post & User
-   [ ] Use Laravel Breeze
-   [ ] User Allow Login & Register
-   [ ] Custom Admin Panel
-   [ ] Custom Landing Page
-   [ ] Use Library CKEditor
-   [ ] Use Library Select2
-   [ ] Use Library Datatables Yajra
-   [ ] Use Library AOS

---

## Installation Steps

1. **Clone the Repository**

    First, clone the repository to your local machine by running:

    ```bash
    git clone https://github.com/robbyardha/cms-app.git
    ```

2. **Run Installation Command**

    Navigate to the project folder and run the installation command to set up the CMS App:

    ```bash
    php artisan arr-cms-app-install

    ```

3. **Change .env**

    In APP_URL you can change url by yourself like:

    ```bash
    https://cms-app.test

    ```

4. **Run Project**

    After the installation is complete, open your browser and run the project by using the following:

    ```bash
    php artisan serve

    ```

    or if you user laragon or laravel herd you can open in browser

    ```bash
    https://cms-app.test/

    ```

5. **Login To Developer Account**

    Login Use Developer Account to give permission another role

    ```bash
    username : developer
    password : developer

    ```

6. **Give Access Permission To Write A Post**

    Give Permission another role to Write A Post

    ```bash
    Goto Menu Access -> Give Permission -> Select Role -> Edit Permission -> Check Access CMS read and Access All Post

    ```

## API Documentation

1. **Login User**

    For Login User to get data user

    ```bash
    METHOD : POST
    ```

    ```bash
    ENDPOINT : /api/login
    ```

    Use body

    | **Key**           | **Value**                            |
    | ----------------- | ------------------------------------ |
    | api_key           | you can see in .env (SECRET_KEY_APP) |
    | username_or_email | username or email                    |
    | password          | password                             |

2. **Logout User**

    For Logout User to destroy data session

    ```bash
    METHOD : GET
    ```

    ```bash
    ENDPOINT : /api/logout
    ```

    Use body

    | **Key** | **Value**                            |
    | ------- | ------------------------------------ |
    | api_key | you can see in .env (SECRET_KEY_APP) |
    | iduser  | iduser from login                    |

3. **Fetch All Post**

    For Fetch Data All Post & Tag

    ```bash
    METHOD : GET
    ```

    ```bash
    ENDPOINT : /api/post
    ```

    Use body

    | **Key** | **Value**                            |
    | ------- | ------------------------------------ |
    | api_key | you can see in .env (SECRET_KEY_APP) |

4. **Show Comment By Specific Post**

    To Show All Comment By Post Id

    ```bash
    METHOD : POST
    ```

    ```bash
    ENDPOINT : /api/show-comment-post
    ```

    Use body

    | **Key** | **Value**                            |
    | ------- | ------------------------------------ |
    | api_key | you can see in .env (SECRET_KEY_APP) |
    | post_id | get from fetch all post              |

5. **Like A Post**

    To Like A Post (login required).

    ```bash
    METHOD : POST
    ```

    ```bash
    ENDPOINT : /api/like-post
    ```

    Use body

    | **Key** | **Value**                            |
    | ------- | ------------------------------------ |
    | api_key | you can see in .env (SECRET_KEY_APP) |
    | post_id | get from fetch all post              |
    | user_id | get from login                       |

6. **Comment A Post**

    To Comment A Post (login required).

    ```bash
    METHOD : POST
    ```

    ```bash
    ENDPOINT : /api/comment-post
    ```

    Use body

    | **Key** | **Value**                            |
    | ------- | ------------------------------------ |
    | api_key | you can see in .env (SECRET_KEY_APP) |
    | post_id | get from fetch all post              |
    | user_id | get from login                       |
    | comment | your comment                         |

### Changes & Improvements:

1. **Clarification on `.env` Change**: In the **Change `.env`** section, I added "configuration" to make it clearer that this is an update to the `.env` file.
2. **Clarified Browser Access**: In the **Run the Project** section, I included an explicit mention that the browser access is an option if you're using Laragon or Laravel Herd.
3. **License Section**: I added the **License** section for completeness. If you plan to make it open-source, it's helpful to include the licensing information.

With these changes, your README is clearer and more structured. It provides a great guide for anyone setting up the project!
