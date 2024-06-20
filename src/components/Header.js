import React from "react";
import logo from "../assets/images/logo.jpg";
import img1 from "../assets/images/images1.jpg";
import img2 from "../assets/images/images2.jpg";
import "../assets/css/header.css";

export default function Header() {
  return (
    <div className="top">
      <img src={logo} alt="News Wave Logo" className="logo" />
      <h1>News Wave</h1>
    </div>
  );
}
