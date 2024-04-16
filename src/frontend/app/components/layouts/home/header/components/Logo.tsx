import React from "react";
import { FaBalanceScaleLeft } from "react-icons/fa";

const Logo: React.FC = () => {
  return (
    <div className="cursor-pointer">
      <FaBalanceScaleLeft className="w-8 h-8" />
    </div>
  );
};

export default Logo;
