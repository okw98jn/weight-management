import type { MetaFunction } from "@remix-run/node";
import { Outlet } from "@remix-run/react";
import Header from "@/components/layouts/home/header/Header";

export const meta: MetaFunction = () => {
  return [
    { title: "Home" },
    { name: "description", content: "Welcome to Remix!" },
  ];
};

export default function HomeLayout() {
  return (
    <div className="w-full h-full">
      <Header />
      <Outlet />
    </div>
  );
}
