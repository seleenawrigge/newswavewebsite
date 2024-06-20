import React from "react";
import { Outlet, useLocation, useNavigate } from "react-router-dom";
import Header from "./Header";
import Menu from "./Menu";
import Footer from "./Footer";
import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';


const Layout = () => {
  return (
    <>
      <Header/>
      <Menu />
      <Outlet />
      <Footer />
    </>
    )
};
export default Layout;
