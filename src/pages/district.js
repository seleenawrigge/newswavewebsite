import React, { useState, useEffect } from "react";
import apiClient from "./../service/axiosService";
import { apis } from "../Apis/apis";
import { Col, Row, Card } from "antd";

const Districts = () => {
  const [districtsList, setDistrictsList] = useState([]);

  useEffect(() => {
    getDistricts();
  }, []);

  const getDistricts = async () => {
    const response = await apiClient.get(apis.getDistricts);
    if (response.status == 200) {
      setDistrictsList(response.data);
    }
  };
  return (
    <Row>
      {districtsList.map((district, index) => (
        <Col sm={3} key={index}>
          <Card
            style={{
              margin: "10px",
              textAlign: "center",
              backgroundColor: "darkgray",
            }}
          >
            {district.names[0]?.name}
          </Card>
        </Col>
      ))}
        
    </Row>
  );
};
export default Districts;
