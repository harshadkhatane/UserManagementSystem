import React from 'react';
import '../Styles/styles.css';

const Layout = ({ children }) => {
    return (
        <div className="container">
            {children}
        </div>
    );
};

export default Layout;
