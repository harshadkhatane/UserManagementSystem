# Getting Started with Create React App

This project was bootstrapped with [Create React App](https://github.com/facebook/create-react-app).


# User Management Application

This is a simple User Management Application built using React for the frontend, PHP for the backend, and MySQL for the database. It allows users to perform CRUD operations on user entities.

## Setup Instructions

### Prerequisites

- Node.js and npm installed on your machine
- XAMPP or any other local server with PHP and MySQL support

### Backend Setup

1. Clone this repository to your local machine.
2. Place the `user-backend` folder in your XAMPP `htdocs` directory.
3. Import the `user_db.sql` file into your MySQL database.
4. Update the database connection details in `api.php` with your MySQL credentials.

### Frontend Setup

1. Navigate to the `user-frontend` directory.
2. Run `npm install` to install dependencies.
3. Update the API base URL in `src/utils/api.js` if necessary.

## How to Run

### Backend

1. Start your XAMPP server.
2. Access `http://localhost/user-backend/api.php` to verify that the backend is running correctly.

### Frontend

1. Navigate to the `user-frontend` directory.
2. Run `npm start` to start the development server.
3. Access `http://localhost:3000` in your browser to view the application.

## Significant Decisions and Assumptions

- Used React for the frontend due to its popularity, ease of use, and rich ecosystem of libraries.
- Chose PHP for the backend as it is widely supported, especially in shared hosting environments.
- Integrated SweetAlert for displaying user-friendly alerts for CRUD operations.
- Assumed a basic user entity structure with fields like name, email, password, and dob.

## Available Scripts

In the project directory, you can run:

### `npm start`

Runs the app in the development mode.\
Open [http://localhost:3000](http://localhost:3000) to view it in your browser.

The page will reload when you make changes.\
You may also see any lint errors in the console.

### `npm test`

Launches the test runner in the interactive watch mode.\
See the section about [running tests](https://facebook.github.io/create-react-app/docs/running-tests) for more information.

### `npm run build`

Builds the app for production to the `build` folder.\
It correctly bundles React in production mode and optimizes the build for the best performance.

The build is minified and the filenames include the hashes.\
Your app is ready to be deployed!

See the section about [deployment](https://facebook.github.io/create-react-app/docs/deployment) for more information.

### `npm run eject`

**Note: this is a one-way operation. Once you `eject`, you can't go back!**

If you aren't satisfied with the build tool and configuration choices, you can `eject` at any time. This command will remove the single build dependency from your project.

Instead, it will copy all the configuration files and the transitive dependencies (webpack, Babel, ESLint, etc) right into your project so you have full control over them. All of the commands except `eject` will still work, but they will point to the copied scripts so you can tweak them. At this point you're on your own.

You don't have to ever use `eject`. The curated feature set is suitable for small and middle deployments, and you shouldn't feel obligated to use this feature. However we understand that this tool wouldn't be useful if you couldn't customize it when you are ready for it.

## Learn More

You can learn more in the [Create React App documentation](https://facebook.github.io/create-react-app/docs/getting-started).

To learn React, check out the [React documentation](https://reactjs.org/).

### Code Splitting

This section has moved here: [https://facebook.github.io/create-react-app/docs/code-splitting](https://facebook.github.io/create-react-app/docs/code-splitting)

### Analyzing the Bundle Size

This section has moved here: [https://facebook.github.io/create-react-app/docs/analyzing-the-bundle-size](https://facebook.github.io/create-react-app/docs/analyzing-the-bundle-size)

### Making a Progressive Web App

This section has moved here: [https://facebook.github.io/create-react-app/docs/making-a-progressive-web-app](https://facebook.github.io/create-react-app/docs/making-a-progressive-web-app)

### Advanced Configuration

This section has moved here: [https://facebook.github.io/create-react-app/docs/advanced-configuration](https://facebook.github.io/create-react-app/docs/advanced-configuration)

### Deployment

This section has moved here: [https://facebook.github.io/create-react-app/docs/deployment](https://facebook.github.io/create-react-app/docs/deployment)

### `npm run build` fails to minify

This section has moved here: [https://facebook.github.io/create-react-app/docs/troubleshooting#npm-run-build-fails-to-minify](https://facebook.github.io/create-react-app/docs/troubleshooting#npm-run-build-fails-to-minify)
