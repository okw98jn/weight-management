import { Card, CardContent } from "@/components/ui/card";
import Graph from "@/features/home/components/Graph";
import Calendar from "@/features/home/components/Calendar";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs";
import type { MainCard } from "@/features/home/types/Index";

type Props = {
  main_card: MainCard;
};

const MainCard: React.FC<Props> = ({ main_card }) => {
  return (
    <Card className="py-6 flex flex-col gap-4 h-full">
      <CardContent>
        <Tabs defaultValue="calendar">
          <TabsList>
            <TabsTrigger value="calendar" className="w-24">
              Calendar
            </TabsTrigger>
            <TabsTrigger value="graph" className="w-24">
              Graph
            </TabsTrigger>
          </TabsList>
          <TabsContent value="calendar">
            <Calendar calendarData={main_card.calendar} />
          </TabsContent>
          <TabsContent value="graph">
            <Graph graphData={main_card.graph} />
          </TabsContent>
        </Tabs>
      </CardContent>
    </Card>
  );
};

export default MainCard;
