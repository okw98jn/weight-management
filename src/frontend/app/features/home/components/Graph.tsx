import React from "react";
import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend,
} from "chart.js";
import { Line } from "react-chartjs-2";
import type { GraphData } from "@/features/home/types/Index";

ChartJS.register(
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend
);

type Props = {
  graphData: GraphData;
};

const Graph: React.FC<Props> = ({ graphData }) => {
  const data = {
    labels: graphData.map((item) => item.date),
    datasets: [
      {
        label: "Weight",
        data: graphData.map((item) => item.weight),
        borderColor: "rgb(100,100,100)",
        backgroundColor: "rgba(255,255,255)",
      },
    ],
  };
  return (
    <div>
      <Line data={data} height={100} />
    </div>
  );
};

export default Graph;
