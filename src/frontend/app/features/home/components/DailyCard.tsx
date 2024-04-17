import { Card, CardContent } from "@/components/ui/card";

const DailyCard = () => {
  return (
    <Card className="py-6 h-full">
      <div className="flex flex-col gap-4">
        <CardContent>
          <p className="flex items-center text-gray-500 gap-2">
            <span className="text-sm">2023-10-01</span>
            <span className="text-green-500">↑</span>
            <span className="font-bold text-black text-2xl">72.5kg</span>
            <span className="text-sm">+1.0</span>
          </p>
        </CardContent>
        <CardContent>
          <p className="flex items-center text-gray-500 gap-2">
            <span className="text-sm">2023-10-01</span>
            <span className="text-red-500">↓</span>
            <span className="font-bold text-black text-2xl">72.5kg</span>
            <span className="text-sm">-1.0</span>
          </p>
        </CardContent>
      </div>
    </Card>
  );
};

export default DailyCard;
