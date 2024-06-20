import React, { useState, useEffect } from "react";
import axios from "axios";
import NewsItem from "../components/NewsItems";
import "../assets/css/news-pages.css";

const Rugby = () => {
  const [articles, setArticles] = useState([]);

  useEffect(() => {
    const getArticles = async () => {
      try {
        const response = await axios.get(
          "https://newsapi.org/v2/everything?q=rugby&apiKey=f45be51d1b2c4f50b1938d180a0dfbb9"
        );
        console.log(response.data); // Logging the response data to check

        // Assuming response.data.articles contains the array of articles
        setArticles(response.data.articles);
      } catch (error) {
        console.error("Error fetching data:", error);
      }
    };

    getArticles(); // Call the async function to fetch data
  }, []); // Empty dependency array means this effect runs only once

  return (
    <div className="news-app">
      <h2>Latest News</h2>
      {articles.map((article) => (
        <NewsItem
          key={article.url} // Assuming url is unique for each article
          title={article.title}
          description={article.description}
          url={article.url}
          urlToImage={article.urlToImage}
        />
      ))}
    </div>
  );
};

export default Rugby;
