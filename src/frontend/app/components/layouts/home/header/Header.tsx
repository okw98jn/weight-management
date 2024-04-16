import React from "react";
import Logo from "./components/Logo";
import MenuList from "./components/MenuList";
import AvatarDropdownMenu from "./components/AvatarDropdownMenu";

const Header: React.FC = () => {
  return (
    <header className="px-[4%] py-4 border-b flex items-center justify-between">
      <div className="flex items-center gap-4">
        <Logo />
        <MenuList />
      </div>
      <AvatarDropdownMenu />
    </header>
  );
};

export default Header;
