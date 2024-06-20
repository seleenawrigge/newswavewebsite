import { BrowserRouter, Routes, Route } from "react-router-dom";
import "./App.css";
import Home from "./pages/homePage";
import Layout from "./components/Layout";
import Colombo from "./pages/colombo";
import Districts from "./pages/district";
import Basketball from "./pages/basketball";
import Football from "./pages/football";
import Rugby from "./pages/rugby";
import Technology from "./pages/technology";
import Education from "./pages/education";
import Economy from "./pages/economy";
import World from "./pages/world";

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route key={"Layout"} path="/" element={<Layout />}>
          <Route key={"homePage"} path="/" element={<Home />} />
          <Route key={"colombo"} path="/colombo" element={<Colombo />} />
          <Route path="/basketball" element={<Basketball />} />
          <Route path="/football" element={<Football />} />
          <Route path="/rugby" element={<Rugby />} />
          <Route path="/technology" element={<Technology />} />
          <Route path="/education" element={<Education />} />
          <Route path="/economy" element={<Economy />} />
          <Route path="/world" element={<World />} />
        </Route>
      </Routes>
    </BrowserRouter>
  );
}

export default App;
