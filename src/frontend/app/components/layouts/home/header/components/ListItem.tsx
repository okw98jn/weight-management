import { Link } from "@remix-run/react";
import React from "react";

type Props = {
  title: string;
  href: string;
  description: string;
};

const ListItem: React.FC<Props> = ({ title, href, description }) => {
  return (
    <li key={title}>
      <Link
        to={href}
        className="block select-none space-y-1 rounded-md p-3 leading-none no-underline outline-none transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground"
      >
        <div className="text-sm font-medium leading-none">{title}</div>
        <p className="line-clamp-2 text-sm leading-snug text-muted-foreground">
          {description}
        </p>
      </Link>
    </li>
  );
};

export default ListItem;
