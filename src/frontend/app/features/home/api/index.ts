import axiosClient from "axiosSetting";
import type { HomeData } from "@/features/home/types/Index";

export const fetchHomeData = async (): Promise<HomeData> => {
  const response = await axiosClient.get<HomeData>("home");
  return response.data;
};
