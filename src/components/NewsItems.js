// src/components/NewsItem.js

import React from "react";

const NewsItem = ({ title, description, url, urlToImage }) => {
  return (
    <div className="news-item">
      <img src={urlToImage} alt={title} className="news-img" />
      <h3>
        <a href={url}>{title}</a>
      </h3>
      <p>{description}</p>
    </div>
  );
};

export default NewsItem;
