import type { MetaFunction } from "@remix-run/node";
import DailyCard from "@/features/home/components/DailyCard";
import MainCard from "@/features/home/components/MainCard";
import TopCard from "@/features/home/components/TopCard";
import { useLoaderData } from "@remix-run/react";
import { fetchHomeData } from "@/features/home/api";

export const meta: MetaFunction = () => {
  return [
    { title: "Home" },
    { name: "description", content: "Welcome to Remix!" },
  ];
};

export const loader = async () => {
  return fetchHomeData();
};

export default function Index() {
  const homeData = useLoaderData<typeof loader>();

  return (
    <div className="grid grid-cols-5 gap-4 px-[4%] py-8 h-[90%]">
      <div className="col-span-4">
        <div className="flex flex-col gap-4 h-full">
          <TopCard top_card={homeData.top_card} />
          <MainCard />
        </div>
      </div>
      <div className="col-span-1">
        <DailyCard daily_card={homeData.daily_card} />
      </div>
    </div>
  );
}
