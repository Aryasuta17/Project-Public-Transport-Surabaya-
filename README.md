# 🚌 Public Transport Optimization for Smart Destination — Surabaya

![Python](https://img.shields.io/badge/Python-3.10-blue)
![Status](https://img.shields.io/badge/Status-Completed-brightgreen)
![Data](https://img.shields.io/badge/Data-GTFS%20%7C%20Survey%20%7C%20GIS-orange)
![Focus](https://img.shields.io/badge/Focus-Smart%20Transportation-lightgrey)
![City](https://img.shields.io/badge/City-Surabaya-informational)

---

## 📌 Project Overview

This project focuses on **improving public transportation systems** to support Surabaya's vision as a **smart tourism destination city**. By combining geospatial data, field survey results, and existing public transport coverage (angkot, Suroboyo Bus, feeder), we analyze bottlenecks and recommend optimized solutions to enhance accessibility, comfort, and integration across transit modes.

This analysis serves as a **data-driven foundation for strategic transportation planning**, particularly in areas surrounding major **tourism destinations**, residential zones, and city borders.

---

## 🎯 Objectives

- Analyze the current condition of public transportation coverage in Surabaya
- Identify areas with **insufficient access** to main routes and smart destinations
- Evaluate **connectivity, frequency, waiting time, and travel experience**
- Provide **recommendations and visual solutions** to enhance urban mobility

---

## 🧪 Key Features

### 🧭 1. Spatial Mapping
- Mapping of public transportation routes using **QGIS** and OpenStreetMap
- Identification of tourism hubs, bus corridors, terminal points, and underserved areas

### 🗣 2. Field Survey Analysis
- Real user survey on comfort, safety, access, and satisfaction
- Analysis of **waiting times**, travel experience, and multimodal integration

### 📉 3. Data Visualization
- Heatmap of demand vs availability
- Line chart of wait times and dissatisfaction causes
- Distribution chart for satisfaction ratings by transport mode

### 🛠 4. Recommendations
- Creation of **proposed new feeder routes**
- Suggestions for better integration between angkot and Suroboyo Bus
- Tourist-focused route optimization for better city accessibility

---

## 🧰 Tech Stack

| Layer        | Tools Used                              |
|--------------|------------------------------------------|
| Programming  | Python (Pandas, Matplotlib, Seaborn)     |
| Spatial Data | QGIS, GeoPandas, Shapefiles              |
| Survey       | Google Forms → CSV                       |
| Design       | Figma (for UI layout & route visualization) |

---

## 📊 Sample Visual Outputs

### 📍 Route Accessibility Mapping  
![Route Map](assets/sample_map.png)

### 📉 Satisfaction Ratings by Transport Mode  
![Chart](assets/satisfaction_chart.png)

---

## 🗂 Project Structure
```
Project-Public-Transport-Surabaya/
│
├── data/ # Survey & GTFS datasets
├── maps/ # QGIS project files and exported layers
├── analysis/ # Notebooks and scripts for data processing
├── design/ # Figma exports or route proposals
├── outputs/ # Charts, visual maps, and reports
│
├── survey_analysis.ipynb # Jupyter notebook for survey EDA
├── transport_mapping.qgz # Main QGIS project file
```


---

## 📌 Insights & Takeaways

- **51.2% of users** experience difficulty reaching tourist areas due to lack of feeder routes.
- **Average wait time** for angkot exceeds **20 minutes** during non-peak hours.
- **More than 60%** of tourists are unaware of Suroboyo Bus corridors.
- Integration between **angkot and main lines** remains weak and unclear.
- Proposed new feeder corridors target underserved zones with high tourism potential.

---

## ✅ Recommendations Summary

1. Add **3 new feeder lines** to connect city borders and tourist hubs.
2. Implement **route signage & digital maps** at every major terminal.
3. Create a **multimodal trip planner app** for local residents and tourists.
4. Encourage use of **cashless and real-time tracking** in angkot fleet.

---

## 📄 License

This project is under the **MIT License**. Feel free to explore and adapt the findings for urban planning, research, or smart mobility initiatives.

---

## 👤 Author

Developed by **Aryasuta**  
🔗 GitHub: [@Aryasuta17](https://github.com/Aryasuta17)  

“A smart destination begins with smart access.”


