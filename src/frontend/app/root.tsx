import {
  Links,
  Meta,
  Outlet,
  Scripts,
  ScrollRestoration,
  useRouteError,
} from "@remix-run/react";
import "./globals.css";

export function Layout({ children }: { children: React.ReactNode }) {
  return (
    <html lang="ja">
      <head>
        <meta charSet="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <Meta />
        <Links />
      </head>
      <body className="w-full h-screen">
        {children}
        <ScrollRestoration />
        <Scripts />
      </body>
    </html>
  );
}

export default function App() {
  return <Outlet />;
}

export function ErrorBoundary() {
  const error: any = useRouteError();
  let ErrorMessage;

  switch (error.status) {
    case 404:
      ErrorMessage = <p>ページが見つかりません。</p>;
      break;
    case 500:
      ErrorMessage = <p>サーバーエラーが発生しました。</p>;
      break;
    default:
      ErrorMessage = <p>エラーが発生しました。</p>;
      break;
  }
  return (
    <html>
      <head>
        <title>Error</title>
        <Meta />
        <Links />
      </head>
      <body>
        {ErrorMessage}
        {/* add the UI you want your users to see */}
        <Scripts />
      </body>
    </html>
  );
}
