import React from "react";
import "../assets/css/footer.css";

export default function Footer() {
  return (
    <div id="footer">
      &copy; {new Date().getFullYear()} NewsWave. All rights reserved.
    </div>
  );
}
