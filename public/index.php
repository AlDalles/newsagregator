<?php

require_once '../vendor/autoload.php';
require_once '../config/eloquent.php';
$categoryArray = array('political'=>'political events in the country and the world ','show business'=>'life of show business ','weather'=>'everything about the weather ','sports'=>'about sports and athletes ');
$postsArray = array("
What is Linux?

    Linux is a clone of the operating system Unix, written from scratch by Linus Torvalds with assistance from a loosely-knit team of hackers across the Net. It aims towards POSIX and Single UNIX Specification compliance.

    It has all the features you would expect in a modern fully-fledged Unix, including true multitasking, virtual memory, shared libraries, demand loading, shared copy-on-write executables, proper memory management, and multistack networking including IPv4 and IPv6.

    It is distributed under the GNU General Public License v2 - see the accompanying COPYING file for more details.

On what hardware does it run?

    Although originally developed first for 32-bit x86-based PCs (386 or higher), today Linux also runs on (at least) the Compaq Alpha AXP, Sun SPARC and UltraSPARC, Motorola 68000, PowerPC, PowerPC64, ARM, Hitachi SuperH, Cell, IBM S/390, MIPS, HP PA-RISC, Intel IA-64, DEC VAX, AMD x86-64 Xtensa, and ARC architectures.

    Linux is easily portable to most general-purpose 32- or 64-bit architectures as long as they have a paged memory management unit (PMMU) and a port of the GNU C compiler (gcc) (part of The GNU Compiler Collection, GCC). Linux has also been ported to a number of architectures without a PMMU, although functionality is then obviously somewhat limited. Linux has also been ported to itself. You can now run the kernel as a userspace application - this is called UserMode Linux (UML).


Documentation

        There is a lot of documentation available both in electronic form on the Internet and in books, both Linux-specific and pertaining to general UNIX questions. I’d recommend looking into the documentation subdirectories on any Linux FTP site for the LDP (Linux Documentation Project) books. This README is not meant to be documentation on the system: there are much better sources available.
        There are various README files in the Documentation/ subdirectory: these typically contain kernel-specific installation notes for some drivers for example. Please read the Minimal requirements to compile the Kernel file, as it contains information about the problems, which may result by upgrading your kernel.

Installing the kernel source

        If you install the full sources, put the kernel tarball in a directory where you have permissions (e.g. your home directory) and unpack it:","Replace “X” with the version number of the latest kernel.

Do NOT use the /usr/src/linux area! This area has a (usually incomplete) set of kernel headers that are used by the library header files. They should match the library, and not get messed up by whatever the kernel-du-jour happens to be.

You can also upgrade between 5.x releases by patching. Patches are distributed in the xz format. To install by patching, get all the newer patch files, enter the top level directory of the kernel source (linux-5.x) and execute:

xz -cd ../patch-5.x.xz | patch -p1

Replace “x” for all versions bigger than the version “x” of your current source tree, in_order, and you should be ok. You may want to remove the backup files (some-file-name~ or some-file-name.orig), and make sure that there are no failed patches (some-file-name# or some-file-name.rej). If there are, either you or I have made a mistake.

Unlike patches for the 5.x kernels, patches for the 5.x.y kernels (also known as the -stable kernels) are not incremental but instead apply directly to the base 5.x kernel. For example, if your base kernel is 5.0 and you want to apply the 5.0.3 patch, you must not first apply the 5.0.1 and 5.0.2 patches. Similarly, if you are running kernel version 5.0.2 and want to jump to 5.0.3, you must first reverse the 5.0.2 patch (that is, patch -R) before applying the 5.0.3 patch. You can read more on this in Applying Patches To The Linux Kernel.

Alternatively, the script patch-kernel can be used to automate this process. It determines the current kernel version and applies any patches found:","HiSilicon SoC uncore PMU driver

Each device PMU has separate registers for event counting, control and interrupt, and the PMU driver shall register perf PMU drivers like L3C, HHA and DDRC etc. The available events and configuration options shall be described in the sysfs, see:

/sys/devices/hisi_sccl{X}_{Y}/hha{Y}/ddrc{Y}>/, or /sys/bus/event_source/devices/hisi_sccl{X}_{Y}/hha{Y}/ddrc{Y}>. The “perf list” command shall list the available events from sysfs.

Each L3C, HHA and DDRC is registered as a separate PMU with perf. The PMU name will appear in event listing as hisi_sccl_module where “sccl-id” is the identifier of the SCCL and “index-id” is the index of module.

e.g. hisi_sccl3_l3c0/rd_hit_cpipe is READ_HIT_CPIPE event of L3C index #0 in SCCL ID #3.

e.g. hisi_sccl1_hha0/rx_operations is RX_OPERATIONS event of HHA index #0 in SCCL ID #1.

The driver also provides a “cpumask” sysfs attribute, which shows the CPU core ID used to count the uncore PMU event.","ARM DynamIQ Shared Unit integrates one or more cores with an L3 memory system, control logic and external interfaces to form a multicore cluster. The PMU allows counting the various events related to the L3 cache, Snoop Control Unit etc, using 32bit independent counters. It also provides a 64bit cycle counter.

The PMU can only be accessed via CPU system registers and are common to the cores connected to the same DSU. Like most of the other uncore PMUs, DSU PMU doesn’t support process specific events and cannot be used in sampling mode.

The DSU provides a bitmap for a subset of implemented events via hardware registers. There is no way for the driver to determine if the other events are available or not. Hence the driver exposes only those events advertised by the DSU, in “events” directory under:

/sys/bus/event_sources/devices/arm_dsu_/

The user should refer to the TRM of the product to figure out the supported events and use the raw event code for the unlisted events.

The driver also exposes the CPUs connected to the DSU instance in “associated_cpus”.

e.g usage:","
Introduction
Terminology

“cgroup” stands for “control group” and is never capitalized. The singular form is used to designate the whole feature and also as a qualifier as in “cgroup controllers”. When explicitly referring to multiple individual control groups, the plural form “cgroups” is used.
What is cgroup?

cgroup is a mechanism to organize processes hierarchically and distribute system resources along the hierarchy in a controlled and configurable manner.

cgroup is largely composed of two parts - the core and controllers. cgroup core is primarily responsible for hierarchically organizing processes. A cgroup controller is usually responsible for distributing a specific type of system resource along the hierarchy although there are utility controllers which serve purposes other than resource distribution.

cgroups form a tree structure and every process in the system belongs to one and only one cgroup. All threads of a process belong to the same cgroup. On creation, all processes are put in the cgroup that the parent process belongs to at the time. A process can be migrated to another cgroup. Migration of a process doesn’t affect already existing descendant processes.

Following certain structural constraints, controllers may be enabled or disabled selectively on a cgroup. All controller behaviors are hierarchical - if a controller is enabled on a cgroup, it affects all processes which belong to the cgroups consisting the inclusive sub-hierarchy of the cgroup. When a controller is enabled on a nested cgroup, it always restricts the resource distribution further. The restrictions set closer to the root in the hierarchy can not be overridden from further away.
","Mounting

Unlike v1, cgroup v2 has only single hierarchy. The cgroup v2 hierarchy can be mounted with the following mount command:

# mount -t cgroup2 none MOUNT_POINT

cgroup2 filesystem has the magic number 0x63677270 (“cgrp”). All controllers which support v2 and are not bound to a v1 hierarchy are automatically bound to the v2 hierarchy and show up at the root. Controllers which are not in active use in the v2 hierarchy can be bound to other hierarchies. This allows mixing v2 hierarchy with the legacy v1 multiple hierarchies in a fully backward compatible way.

A controller can be moved across hierarchies only after the controller is no longer referenced in its current hierarchy. Because per-cgroup controller states are destroyed asynchronously and controllers may have lingering references, a controller may not show up immediately on the v2 hierarchy after the final umount of the previous hierarchy. Similarly, a controller should be fully disabled to be moved out of the unified hierarchy and it may take some time for the disabled controller to become available for other hierarchies; furthermore, due to inter-controller dependencies, other controllers may need to be disabled too.

While useful for development and manual configurations, moving controllers dynamically between the v2 and other hierarchies is strongly discouraged for production use. It is recommended to decide the hierarchies and controller associations before starting using the controllers after system boot.

During transition to v2, system management software might still automount the v1 cgroup filesystem and so hijack all controllers during boot, before manual intervention is possible. To make testing and experimenting easier, the kernel parameter cgroup_no_v1= allows disabling controllers in v1 and make them always available in v2.

cgroup v2 currently supports the following mount options.

    nsdelegate","
        Consider cgroup namespaces as delegation boundaries. This option is system wide and can only be set on mount or modified through remount from the init namespace. The mount option is ignored on non-init namespace mounts. Please refer to the Delegation section for details.

    memory_localevents

        Only populate memory.events with data for the current cgroup, and not any subtrees. This is legacy behaviour, the default behaviour without this option is to include subtree counts. This option is system wide and can only be set on mount or modified through remount from the init namespace. The mount option is ignored on non-init namespace mounts.

    memory_recursiveprot

        Recursively apply memory.min and memory.low protection to entire subtrees, without requiring explicit downward propagation into leaf cgroups. This allows protecting entire subtrees from one another, while retaining free competition within those subtrees. This should have been the default behavior but is a mount-option to avoid regressing setups relying on the original semantics (e.g. specifying bogusly high ‘bypass’ protection values at higher tree levels).

Organizing Processes and Threads
Processes

Initially, only the root cgroup exists to which all processes belong. A child cgroup can be created by creating a sub-directory:","A given cgroup may have multiple child cgroups forming a tree structure. Each cgroup has a read-writable interface file “cgroup.procs”. When read, it lists the PIDs of all processes which belong to the cgroup one-per-line. The PIDs are not ordered and the same PID may show up more than once if the process got moved to another cgroup and then back or the PID got recycled while reading.

A process can be migrated into a cgroup by writing its PID to the target cgroup’s “cgroup.procs” file. Only one process can be migrated on a single write(2) call. If a process is composed of multiple threads, writing the PID of any thread migrates all threads of the process.

When a process forks a child process, the new process is born into the cgroup that the forking process belongs to at the time of the operation. After exit, a process stays associated with the cgroup that it belonged to at the time of exit until it’s reaped; however, a zombie process does not appear in “cgroup.procs” and thus can’t be moved to another cgroup.

A cgroup which doesn’t have any children or live processes can be destroyed by removing the directory. Note that a cgroup which doesn’t have any children and is associated only with zombie processes is considered empty and can be removed:","Threads

cgroup v2 supports thread granularity for a subset of controllers to support use cases requiring hierarchical resource distribution across the threads of a group of processes. By default, all threads of a process belong to the same cgroup, which also serves as the resource domain to host resource consumptions which are not specific to a process or thread. The thread mode allows threads to be spread across a subtree while still maintaining the common resource domain for them.

Controllers which support thread mode are called threaded controllers. The ones which don’t are called domain controllers.

Marking a cgroup threaded makes it join the resource domain of its parent as a threaded cgroup. The parent may be another threaded cgroup whose resource domain is further up in the hierarchy. The root of a threaded subtree, that is, the nearest ancestor which is not threaded, is called threaded domain or thread root interchangeably and serves as the resource domain for the entire subtree.

Inside a threaded subtree, threads of a process can be put in different cgroups and are not subject to the no internal process constraint - threaded controllers can be enabled on non-leaf cgroups whether they have threads in them or not.

As the threaded domain cgroup hosts all the domain resource consumptions of the subtree, it is considered to have internal resource consumptions whether there are processes in it or not and can’t have populated child cgroups which aren’t threaded. Because the root cgroup is not subject to no internal process constraint, it can serve both as a threaded domain and a parent to domain cgroups.

The current operation mode or type of the cgroup is shown in the “cgroup.type” file which indicates whether the cgroup is a normal domain, a domain which is serving as the domain of a threaded subtree, or a threaded cgroup.

On creation, a cgroup is always a domain cgroup and can be made threaded by writing “threaded” to the “cgroup.type” file. The operation is single direction:","Control Groupstats is inspired by the discussion at http://lkml.org/lkml/2007/4/11/187 and implements per cgroup statistics as suggested by Andrew Morton in http://lkml.org/lkml/2007/4/11/263.

Per cgroup statistics infrastructure re-uses code from the taskstats interface. A new set of cgroup operations are registered with commands and attributes specific to cgroups. It should be very easy to extend per cgroup statistics, by adding members to the cgroupstats structure.

The current model for cgroupstats is a pull, a push model (to post statistics on interesting events), should be very easy to add. Currently user space requests for statistics by passing the cgroup path. Statistics about the state of all the tasks in the cgroup is returned to user space.

NOTE: We currently rely on delay accounting for extracting information about tasks blocked on I/O. If CONFIG_TASK_DELAY_ACCT is disabled, this information will not be available.

To extract cgroup statistics a utility very similar to getdelays.c has been developed, the sample output of the utility is shown below:","
Resource management

    Since creation and destruction of all IB resources is done by commands passed through a file descriptor, the kernel can keep track of which resources are attached to a given userspace context. The ib_uverbs module maintains idr tables that are used to translate between kernel pointers and opaque userspace handles, so that kernel pointers are never exposed to userspace and userspace cannot trick the kernel into following a bogus pointer.

    This also allows the kernel to clean up when a process exits and prevent one process from touching another process’s resources.

Memory pinning

    Direct userspace I/O requires that memory regions that are potential I/O targets be kept resident at the same physical address. The ib_uverbs module manages pinning and unpinning memory regions via get_user_pages() and put_page() calls. It also accounts for the amount of memory pinned in the process’s pinned_vm, and checks that unprivileged processes do not exceed their RLIMIT_MEMLOCK limit.

    Pages that are pinned multiple times are counted each time they are pinned, so the value of pinned_vm may be an overestimate of the number of pages pinned by a process.

");
$tag_array=array('actual'=>'about all','incidents'=>'what happens','disasters'=>'global disasters ','progress'=>'about progress','the science'=>'science achievements','war'=>'conflicts','children'=>'about our children','animals'=>"human's best friends",'finance'=>'big money','entertainment'=>'for fan' );



foreach ($categoryArray as $key=>$value)
{

    $category1 = new \Hillel\Model\category;
    $category1->title="$key";
    $category1->slug="$value";
    var_dump($category1);
    $category1->save();


}

$category= \Hillel\Model\category::find(5);
$category->title='bla bla bla';
$category->slug="about blablabla";
$category->save();
//echo "bla bla bla";
//$category->delete();


foreach ($postsArray as $value)
{

    $post=new \Hillel\Model\post;
    $post->title = "title #".rand(1,28);
    $post->slug= "some slug #".rand(12,44);
    $post->body= $value;
    $post->category_id=rand(1,5);
    $post->save();
}

$post1=\Hillel\Model\post::find(4);
$post1->title="bla bla bla again";
$post1->slug="blablablablablabla";
$post1->body=",blablablablablabla,blablablablablabla,blablablablablablablablablablablabla,blablablablablabla,blablablablablablablablablablablabla,
blablablablablabla,blablablablablablablablablablablabla,blablablablablabla,blablablablablabla";
$post1->category_id=3;
$post1->save();
$post1->delete();



$cat = \Hillel\Model\category::find(2);
$posts = $cat->posts;
   foreach ($posts as $post ){
    echo "<h1>".$post->title."</h1>";
    echo "<h3>".$post->slug."</h3>";
    echo $post->body."<br>";

}



foreach ($tag_array as $key=>$value) {
    $tag = new \Hillel\Model\tag;
    $tag->title = $key;
    $tag->slug  = $value;
    $tag->save();


}



for($i=1;$i<=10;$i++)
{
    $post = \Hillel\Model\post::find($i);
    $post->tags()->attach([rand(1, 10), rand(1, 10), rand(1, 10)]);
}



