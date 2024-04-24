export type HomeData = {
  top_card: TopCard;
  daily_card: DailyCard;
  main_card: MainCard;
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

export type MainCard = {
  graph: GraphData;
  calendar: CalendarData;
};

export type GraphData = {
  date: string;
  weight: string;
}[];

export type CalendarData = {
  id: string;
  title: string;
  start: string;
}[];
