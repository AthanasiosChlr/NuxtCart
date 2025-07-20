# NuxtCart

NuxtCart is a modern e-commerce platform built with [Nuxt.js](https://nuxtjs.org/) and [Laravel](https://laravel.com/). It provides a seamless shopping experience with features like product management, user authentication, and responsive design.

## Features (In Progress 🚧)

- 🛒 **E-commerce Functionality**: Add products to the cart, manage orders, and browse categories.
- 📱 **Responsive Design**: Fully optimized for desktop, tablet, and mobile devices.
- 🔒 **Authentication**: Secure user login and registration.
- ⚙️ **Admin Dashboard**: Manage products, orders, and users.
- 🌙 **Dark Mode**: Built-in support for light and dark themes.
- 🚀 **Performance**: Optimized for fast loading and smooth user experience.

> **Note:** Features are currently under development and may not be fully functional.

---

## Tech Stack

- **Frontend**: [Nuxt.js](https://nuxtjs.org/), [Vue.js](https://vuejs.org/), [Tailwind CSS](https://tailwindcss.com/)
- **Backend**: [Laravel](https://laravel.com/)
- **Database**: [MySQL](https://www.mysql.com/)

---

## Installation

### 1. Clone the repository:
   ```bash
   git clone https://github.com/AthanasiosChlr/nuxtcart.git
   cd nuxtcart
   ```

---

### 2. Set up the Laravel Backend with Docker:
1. Navigate to the `backend` folder:
   ```bash
   cd backend
   ```

2. Start the Docker containers:
   ```bash
   docker-compose up --build
   ```

   This will:
   - Build and start the `laravel-app` container for the Laravel backend.
   - Start the `laravel-db` container for the MySQL database.
   - Start the `laravel-phpmyadmin` container for phpMyAdmin.

3. Access the services:
   - **Laravel Backend**: [http://localhost:8000](http://localhost:8000)
   - **phpMyAdmin**: [http://localhost:8080](http://localhost:8080)

4. Run database migrations:
   Open a terminal in the `laravel-app` container:
   ```bash
   docker exec -it laravel-app bash
   php artisan migrate
   ```

---

### 3. Set up the Nuxt Frontend:
1. Navigate to the `frontend` folder:
   ```bash
   cd ../frontend
   ```

2. Install frontend dependencies:
   ```bash
   npm install
   ```

3. Configure the API URL:
   - Open the `nuxt.config.js` file in the `frontend` folder.
   - Add the following under the `runtimeConfig` section:
     ```js
     export default {
       runtimeConfig: {
         public: {
           apiUrl: 'http://localhost:8000/api', // Laravel backend API URL
         },
       },
     };
     ```

4. Start the Nuxt development server:
   ```bash
   npm run dev
   ```

   The frontend will be available at:
   ```
   http://localhost:3000
   ```

---

### 4. Build for Production (Optional):
#### Backend:
1. Configure your production `.env` file.
2. Run the following command to serve the backend:
   ```bash
   docker-compose up --build
   ```

#### Frontend:
1. Build the frontend for production:
   ```bash
   npm run build
   ```

2. Start the production server:
   ```bash
   npm run start
   ```

---

### 5. Access the Application:
- **Frontend**: [http://localhost:3000](http://localhost:3000)
- **Backend API**: [http://localhost:8000/api](http://localhost:8000/api)
- **phpMyAdmin**: [http://localhost:8080](http://localhost:8080)

---

### Notes:
1. **Environment Variables**:
   - Ensure the `.env` file in the `backend` folder is properly configured with the database credentials:
     ```
     DB_CONNECTION=mysql
     DB_HOST=db
     DB_PORT=3306
     DB_DATABASE=laravel
     DB_USERNAME=laravel
     DB_PASSWORD=secret
     ```

2. **Docker Commands**:
   - Stop the containers:
     ```bash
     docker-compose down
     ```
   - Rebuild the containers:
     ```bash
     docker-compose up --build
     ```
   - View logs:
     ```bash
     docker-compose logs -f
     ```

---