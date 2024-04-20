import { Card, CardContent } from "@/components/ui/card";
import type { DailyCard } from "@/features/home/types/Index";
import { getTextColor } from "@/features/home/utils/CommonUtil";

type Props = {
  daily_card: DailyCard;
};

// 体重の増減に応じて表示するテキストを変更する
const renderWeightDiffOrDirection = (
  weight_diff: string,
  is_lower: boolean
) => {
  if (weight_diff === "0.0kg") {
    return "-";
  }
  return is_lower ? "↓" : "↑";
};

const DailyCard: React.FC<Props> = ({ daily_card }) => {
  return (
    <Card className="py-6 h-full">
      {daily_card.length === 0 && (
        <CardContent className="flex items-center justify-center h-full w-full">
          <p className="text-gray-400">No Data Available</p>
        </CardContent>
      )}
      <div className="flex flex-col gap-4">
        {daily_card.map((item) => (
          <CardContent key={item.report_date}>
            <p className="flex items-center text-gray-500 gap-2">
              <span className="text-sm">{item.report_date}</span>
              <span
                className={`${getTextColor(item.weight_diff, item.is_lower)}`}
              >
                {renderWeightDiffOrDirection(item.weight_diff, item.is_lower)}
              </span>
              <span className="font-bold text-black text-2xl">
                {item.weight}
              </span>
              <span className="text-sm">{item.weight_diff}</span>
            </p>
          </CardContent>
        ))}
      </div>
    </Card>
  );
};

export default DailyCard;
