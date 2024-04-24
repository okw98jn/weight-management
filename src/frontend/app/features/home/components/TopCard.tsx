import { Card, CardContent } from "@/components/ui/card";
import type { TopCard } from "@/features/home/types/Index";
import { getTextColor } from "@/features/home/utils/CommonUtil";

type Props = {
  top_card: TopCard;
};

const TopCard: React.FC<Props> = ({ top_card }) => {
  return (
    <Card className="pt-4 flex flex-col">
      <CardContent>
        <p className="flex items-center gap-2">
          <span className="text-gray-500 text-sm">Today</span>
          <span
            className={`font-bold text-2xl ${getTextColor(
              top_card.today_weight,
              top_card.is_lower
            )}`}
          >
            {!top_card.is_lower && "+"}
            {top_card.weight_diff}
          </span>
        </p>
      </CardContent>
      <CardContent>
        <p className="font-bold text-4xl">{top_card.today_weight}</p>
      </CardContent>
      <CardContent>
        <p className="text-gray-500 text-sm flex gap-2">
          <span>Start: {top_card.start_weight}</span>
          <span>Goal: {top_card.goal_weight}</span>
        </p>
      </CardContent>
    </Card>
  );
};

export default TopCard;
