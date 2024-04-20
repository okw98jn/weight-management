export type HomeData = {
  top_card: TopCard;
  daily_card: DailyCard;
};

export type TopCard = {
  today_weight: string;
  weight_diff: string;
  start_weight: string;
  goal_weight: string;
  is_lower: boolean;
};

export type DailyCard = {
  weight: string;
  weight_diff: string;
  report_date: string;
  is_lower: boolean;
}[];
