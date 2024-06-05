import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import UserList from './Components/UserList';
import AddUser from './Components/AddUser';
import EditUser from './Components/EditUser';
import Layout from './Components/Layout';


const App = () => {
    return (
        <Router>
          <h1>User Management System</h1>
                <Layout>
                  <Routes>
                      <Route exact path="/" element={<UserList />} />
                      <Route path="/add-user" element={<AddUser />} />
                      <Route path="/edit/:id" element={<EditUser />} />
                  </Routes>
                </Layout>
        </Router>
    );
};

export default App;
