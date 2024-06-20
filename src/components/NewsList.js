import React, { useState, useEffect } from "react";
import axios from "axios";
import NewsItem from "./NewsItems";

const NewsList = () => {
  const [articles, setArticles] = useState([]);

  useEffect(() => {
    const getArticles = async () => {
      try {
        const response = await axios.get(
          "https://newsapi.org/v2/everything?q=srilanka&apiKey=f45be51d1b2c4f50b1938d180a0dfbb9"
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
    <div>
      {/* Displaying articles */}
      <h2>Latest News</h2>

      {articles.map((articles) => {
        return (
          <NewsItem
            title={articles.title}
            description={articles.description}
            url={articles.url}
            urlToImage={articles.urlToImage}
          />
        );
      })}
    </div>
  );
};

export default NewsList;
