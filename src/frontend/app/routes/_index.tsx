import type { MetaFunction } from "@remix-run/node";

export const meta: MetaFunction = () => {
  return [
    { title: "remix" },
    { name: "description", content: "Welcome to Remix!" },
  ];
};

export default function Index() {
  return <main></main>;
}
