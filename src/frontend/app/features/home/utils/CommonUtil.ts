// 体重の増減に応じてテキストカラーを変更する
export const getTextColor = (weight: string, is_lower: boolean): string => {
  if (weight === "0.0kg") {
    return "text-black";
  }
  return is_lower ? "text-green-500" : "text-red-500";
};
