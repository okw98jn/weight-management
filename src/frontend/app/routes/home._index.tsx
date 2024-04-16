import type { MetaFunction } from "@remix-run/node";
import DailyCard from "@/features/home/DailyCard";
import MainCard from "@/features/home/MainCard";
import TopCard from "@/features/home/TopCard";

export const meta: MetaFunction = () => {
  return [
    { title: "Home" },
    { name: "description", content: "Welcome to Remix!" },
  ];
};

export default function Index() {
  return (
    <div className="grid grid-cols-5 gap-4 px-[4%] py-8 h-[90%]">
      <div className="col-span-4">
        <div className="flex flex-col gap-4 h-full">
          <TopCard />
          <MainCard />
        </div>
      </div>
      <div className="col-span-1">
        <DailyCard />
      </div>
    </div>
  );
}
