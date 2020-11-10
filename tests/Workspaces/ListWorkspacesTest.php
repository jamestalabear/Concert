<?php

namespace Seatsio\Charts;

use Seatsio\SeatsioClientTest;
use function Functional\map;

class ListWorkspacesTest extends SeatsioClientTest
{

    public function test()
    {
        $this->seatsioClient->workspaces->create("ws1");
        $this->seatsioClient->workspaces->create("ws2");
        $this->seatsioClient->workspaces->create("ws3");

        $workspaces = $this->seatsioClient->workspaces->listAll();
        $workspaceNames = map($workspaces, function ($workspace) {
            return $workspace->name;
        });

        self::assertEquals(["ws3", "ws2", "ws1", "Default workspace"], array_values($workspaceNames));
    }

    public function test_filter()
    {
        $this->seatsioClient->workspaces->create("someWorkspace");
        $this->seatsioClient->workspaces->create("anotherWorkspace");
        $this->seatsioClient->workspaces->create("anotherAnotherWorkspace");

        $workspaces = $this->seatsioClient->workspaces->listAll("another");
        $workspaceNames = map($workspaces, function ($workspace) {
            return $workspace->name;
        });

        self::assertEquals(["anotherAnotherWorkspace", "anotherWorkspace"], array_values($workspaceNames));
    }

}
