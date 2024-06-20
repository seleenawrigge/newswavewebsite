import React from "react";
import "../assets/css/menu.css";

export default function Menu() {
  return (
    <ul>
      <li>
        <a href="/">Home</a>{" "}
      </li>
      <li className="dropdown">
        <a href="/aboutUs" className="dropbtn">
          Sports
        </a>
        <div className="dropdown-content">
          <a href="/colombo">Cricket</a>
          <a href="/football">Football</a>
          <a href="/ball">Basketball</a>
          <a href="/rugby">Rugby</a>
        </div>
      </li>
      <li className="dropdown">
        {" "}
        <a href="/technology">Technology</a> {/* Regular link for Technology */}
      </li>
      {/* drop menu for About us */}
      <li className="dropdown">
        <a href="/Education">Education</a>
      </li>
      {/* drop menu for Products */}
      <li className="dropdown">
        <a href="/economy">Economy</a>
      </li>
      <li className="dropdown">
        <a href="/world">World</a>
      </li>
      <li>
        <a target="blank" href="http://localhost:3000//uploads/view.php">
          Upload
        </a>{" "}
      </li>
    </ul>
  );
}
