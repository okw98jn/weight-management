import { Card, CardContent } from "@/components/ui/card";

const TopCard = () => {
  return (
    <Card className="py-6 flex flex-col gap-3">
      <CardContent>
        <p className="flex items-center gap-2">
          <span className="text-gray-500 text-sm">Today</span>
          <span className="font-bold text-black text-2xl">-0.5kg</span>
        </p>
      </CardContent>
      <CardContent>
        <p className="font-bold text-4xl">72.5kg</p>
      </CardContent>
      <CardContent>
        <p className="text-gray-500 text-sm flex gap-2">
          <span>Start: 75.0kg</span>
          <span>Goal: 70.0kg</span>
        </p>
      </CardContent>
    </Card>
  );
};

export default TopCard;
