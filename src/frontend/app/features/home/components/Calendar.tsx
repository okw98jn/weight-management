import FullCalendar from "@fullcalendar/react";
import dayGridPlugin from "@fullcalendar/daygrid";
import "../css/calendar.css";
import type { CalendarData } from "@/features/home/types/Index";

type Props = {
  calendarData: CalendarData;
};

const Calendar: React.FC<Props> = ({ calendarData }) => {
  const renderDayCell = (e: any) => {
    const { dayNumberText, isToday } = e;
    const replaceDayNumberText = dayNumberText.replace("日", "");

    return isToday ? (
      <div className="today-circle">{replaceDayNumberText}</div>
    ) : (
      <div>{replaceDayNumberText}</div>
    );
  };

  return (
    <div className="mt-10">
      <div>
        <FullCalendar
          plugins={[dayGridPlugin]}
          initialView="dayGridMonth"
          height={450}
          headerToolbar={false}
          aspectRatio={1.6}
          businessHours={{ daysOfWeek: [1, 2, 3, 4, 5] }}
          initialEvents={calendarData}
          eventBackgroundColor={"#FFFFFF"}
          eventBorderColor={"rgb(200,200,200)"}
          eventTextColor={"#37362f"}
          dayCellContent={renderDayCell}
          eventClick={(e) => console.log(e.event.id)}
        />
      </div>
    </div>
  );
};

export default Calendar;
